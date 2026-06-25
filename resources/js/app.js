import './bootstrap';

import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom';
import 'tinymce/models/dom/model';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/image';
import 'tinymce/plugins/fullscreen';

if (document.getElementById('password-addon')) {
  document.getElementById('password-addon').addEventListener('click', function() {
    const passwordInput = document.getElementById('password-input');
    const icon = document.querySelector('#password-addon .bi');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
      passwordInput.type = 'password';
      icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
  });
}

function dropdownTrigger() {
  document.querySelectorAll('.dropdown-trigger').forEach(trigger => {
    trigger.addEventListener('click', function() {
      document.querySelectorAll('.dropdown-menu-wrap').forEach(menu => menu.classList.add('hidden'));
      const thisDropdown = this.parentNode.querySelector('.dropdown-menu-wrap');
      thisDropdown.classList.toggle('hidden');
      thisDropdown.classList.toggle('block');
    });
  });
}
dropdownTrigger();

document.querySelectorAll('.alert-close').forEach(closeButton => {
  closeButton.addEventListener('click', function() {
    this.parentNode.remove();
  });
});

window.addEventListener('DOMContentLoaded', () => {
  const textEditorFull = {
    selector: '.tinymce-textarea',
    menubar: false,
    inline: false,
    // forced_root_block: 'p',  // Use <p> tags for Enter key
    shift_enter: 'br',  // Use <br /> for Shift + Enter
    plugins: [
      'link', 'lists', 'autolink', 'fullscreen', 'image'
    ],
    toolbar: [
      'undo redo | bold italic underline | fontsize | openFileManager | image',
      'forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | link fullscreen'
    ],
    /* TinyMCE configuration options */
    skin: false,
    content_css: false,
    content_style: "body { font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 21px; }",
    setup: function (editor) {
      // Register a custom button in the toolbar
      editor.ui.registry.addButton('openFileManager', {
        text: 'File Manager',
        onAction: function () {
          // Open the filemanager modal when the button is clicked
          // const fileManagerModal = new bootstrap.Modal(document.getElementById('fileManagerModal'));
          // fileManagerModal.show();
          document.getElementById('fileManagerModal').classList.remove('hidden');
          document.getElementById('fileManagerModal').classList.add('block');

          const dataParentModal = 'filemanager';
          const dataUrl = `${baseHref}/${adminUrl}/filemanager/modal?path=`;
          loadFileManagerContent(dataUrl, '', dataParentModal, '');
        }
      });
    }
  };

  tinymce.init(textEditorFull);
});

function showModal() {
  const showModal = document.querySelectorAll('.show-modal');
  showModal.forEach((thisButton) => {
    thisButton.addEventListener('click', function(e) {
      const thisDataModal = thisButton.getAttribute('data-modal');
      document.getElementById(thisDataModal).classList.remove('hidden');
      document.getElementById(thisDataModal).classList.add('block');

      if (thisDataModal === 'fileManagerModal') {
        const dataUrl = this.getAttribute('data-url');
        const dataParentModal = this.getAttribute('data-parent');
        const dataInputId = this.getAttribute('data-input-id');
        loadFileManagerContent(dataUrl, '', dataParentModal, dataInputId);
      }

      // overflow hidden to body
      const bodyElm = document.querySelector('body');
      bodyElm.classList.add('overflow-hidden');
    })
  })
}
showModal();

function closeModal() {
  const showModal = document.querySelectorAll('.close-modal');
  showModal.forEach((thisButton) => {
    thisButton.addEventListener('click', function(e) {
      const thisDataModal = thisButton.getAttribute('data-modal');
      document.getElementById(thisDataModal).classList.remove('block');
      document.getElementById(thisDataModal).classList.add('hidden');

      // overflow hidden to body
      const bodyElm = document.querySelector('body');
      bodyElm.classList.remove('overflow-hidden');
    })
  })
}

document.querySelectorAll('.show-filemanager').forEach(button => {
  button.addEventListener('click', function() {
    const dataIdImageSelected = this.getAttribute('data-id');
    document.getElementById('idDataToEdit').value = dataIdImageSelected;
  });
});

document.querySelectorAll('.open-file-manager').forEach(button => {
  button.addEventListener('click', function() {
    const dataUrl = this.getAttribute('data-url');
    const dataParentModal = this.getAttribute('data-parent');
    const dataInputId = this.getAttribute('data-input-id');
    loadFileManagerContent(dataUrl, '', dataParentModal, dataInputId);
  });
});

if (document.getElementById('file-manager-wrapper')) {
  const dataUrl = document.getElementById('file-manager-wrapper').getAttribute('data-url');
  loadFileManagerContent(dataUrl, '', '', '');
}

function loadFileManagerContent(url, path = '', parent_modal = '', input_id = '') {
  fetch(url + path)
    .then(response => response.text())
    .then(html => {
      document.getElementById('fileManagerContent').innerHTML = html;
      document.getElementById('uploadPath').value = path;
      document.getElementById('folderPath').value = path;
      uploadAction(url, parent_modal, input_id);
      createFolderAction(url, parent_modal, input_id);
      clickFolder(parent_modal, input_id);
      selectOptionView(url, parent_modal, input_id);
      // openCreateNewFolder();
      deleteItem(url, parent_modal, input_id);
      attachFile(parent_modal, input_id);
      copyToClipboard();
      dropdownTrigger();

      showModal();
      closeModal();
    });
}

function uploadAction(urlFileManager, parent_modal, input_id) {
  document.getElementById('fileInput').addEventListener('change', function(event) {
    const formData = new FormData(document.getElementById('uploadForm'));
    const dataUrl = this.getAttribute('data-url');
    formData.append('_token', csrfToken);
    const currentPath = document.getElementById('uploadPath').value;

    fetch(dataUrl, {
      method: "POST",
      body: formData
    })
    .then(response => loadFileManagerContent(urlFileManager, currentPath, parent_modal, input_id))
    .catch(error => console.error("ERROR", error));
  });
}

function createFolderAction(urlFileManager, parent_modal, input_id) {
  document.getElementById('createFolderForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const dataUrl = this.getAttribute('action');
    const currentPath = document.getElementById('folderPath').value;

    fetch(dataUrl, {
      method: "POST",
      body: formData
    })
    .then(response => loadFileManagerContent(urlFileManager, currentPath, parent_modal, input_id))
    .catch(error => console.error("ERROR", error));

    // close modal 
    document.getElementById('modalCreateNewFolder').classList.remove('block');
    document.getElementById('modalCreateNewFolder').classList.add('hidden');

    // overflow hidden to body
    const bodyElm = document.querySelector('body');
    bodyElm.classList.remove('overflow-hidden');
  });
}

function clickFolder(parent_modal, input_id) {
  document.querySelectorAll('.folder-link').forEach(link => {
    link.addEventListener('click', function() {
      const dataUrl = this.getAttribute('data-url');
      const folderPath = this.getAttribute('data-path');
      loadFileManagerContent(dataUrl, folderPath, parent_modal, input_id);
    });
  });
  document.querySelectorAll('.back-link').forEach(link => {
    link.addEventListener('click', function() {
      const dataUrl = this.getAttribute('data-url');
      const folderPath = this.getAttribute('data-path');
      loadFileManagerContent(dataUrl, folderPath, parent_modal, input_id);
    });
  });
}

function selectOptionView(urlFileManager, parent_modal, input_id) {
  document.querySelectorAll('.select-view-opt').forEach(button => {
    button.addEventListener('click', function() {
      const thisOpt = this.getAttribute('data-option');
      const dataUrl = this.getAttribute('data-url');
      // document.querySelectorAll('.option-view').forEach(view => view.style.display = 'none');
      // document.querySelectorAll('.select-view-opt').forEach(opt => opt.classList.replace('btn-secondary', 'btn-light'));
      // document.getElementById(thisOpt).style.display = 'block';
      // this.classList.replace('btn-light', 'btn-secondary');
      
      fetch(dataUrl, {
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': csrfToken,
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ view: thisOpt })
      })
      .then(response => loadFileManagerContent(urlFileManager, document.getElementById('uploadPath').value, parent_modal, input_id))
      .catch(error => console.error("ERROR", error));
    });
  });
} 

function deleteItem(urlFileManager, parent_modal, input_id) {
  document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function() {
      const pathItem = this.getAttribute('data-path');
      const dataType = this.getAttribute('data-type');
      const dataUrl = this.getAttribute('data-url');
      let messageConfirm = dataType === 'folder' ? 'Are you sure to delete this folder?' : 'Are you sure to delete this file?';

      if (confirm(messageConfirm)) {
        fetch(dataUrl, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ path: pathItem })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('File/folder deleted successfully!');
            loadFileManagerContent(urlFileManager, document.getElementById('uploadPath').value, parent_modal, input_id);
          } else {
            alert('Error deleting file/folder: ' + data.message);
          }
        });
      }
    });
  });
}

function attachFile(parent_modal, input_id) {
  document.querySelectorAll('.attach-file-toform').forEach(button => {
    button.addEventListener('click', function() {
      const getNameFile = this.getAttribute('data-name');
      const getPathFile = this.getAttribute('data-path');
      if (parent_modal === 'filemanager') {
        const imgHtml = `<p><img src="${storagePath}/${getPathFile}" alt="${getNameFile}" /></p>`;
        tinymce.activeEditor.insertContent(imgHtml);
      } else {
        document.getElementById(parent_modal).querySelector('.img-preview-upload').src = `${storagePath}/${getPathFile}`;
        document.getElementById(input_id).value = getPathFile;
      }
    });
  });
}

function copyToClipboard() {
  document.querySelectorAll('.copy-to-clipboard').forEach(button => {
    button.addEventListener('click', function() {
      navigator.clipboard.writeText(this.getAttribute('data-path'));
    });
  });
}

const imageListAdd = document.getElementById('gallery-image-list-add');
const existingData = imageListAdd.children.length;
const btnAddImage = document.getElementById('add-image-gallery');

if (btnAddImage) {
  let indexNumImg = existingData;
  btnAddImage.addEventListener('click', function() {
    const dataUrl = btnAddImage.getAttribute('data-url');
    // const existingData = imageListAdd.innerHTML;

    // Create a new row element
    const newRow = document.createElement("tr");

    // Set an ID for the new row (e.g., using a unique value like timestamp or row count)
    newRow.id = `data-image-${indexNumImg}`;

    // Define the content for each cell in the new row
    newRow.innerHTML = `
      <td class="align-top">
        <div class="border rounded-lg w-full overflow-hidden bg-white">
          <input type="text" name="image[${indexNumImg}][title]" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type title" />
        </div>
      </td>
      <td>
        <div id="add-single-image-${indexNumImg}" class="block">
          <img id="img-preview-upload-${indexNumImg}" src="https://via.placeholder.com/100" filename="" alt="" class="w-24 h-24 object-cover mb-2 img-preview-upload" />
          <button type="button" class="p-1 px-2 text-xs text-white bg-blue rounded show-modal" data-url="${dataUrl}" data-modal="fileManagerModal" data-parent="add-single-image-${indexNumImg}" data-input-id="image-input-${indexNumImg}">Pilih File</button>
          <input id="image-input-${indexNumImg}" type="hidden" name="image[${indexNumImg}][image]" />
        </div>
      </td>
      <td class="align-top">
        <div class="border rounded-lg w-full overflow-hidden bg-white">
          <input type="number" name="image[${indexNumImg}][num_order]" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type number order" />
        </div>
      </td>
      <td class="align-top">
        <button class="text-red-700 text-sm btn-delete-image" data-id="data-image-${indexNumImg}">Remove</button>
      </td>
    `;

    // Append the new row to the table body
    imageListAdd.appendChild(newRow);
    indexNumImg++;

    showModal();
    deleteImageGallery();
  })
}

function deleteImageGallery() {
  const btnDeleteImage = document.querySelectorAll('.btn-delete-image');
  btnDeleteImage.forEach((item) => {
    item.addEventListener('click', function(){
      const thisDataId = item.getAttribute('data-id');
      document.getElementById(thisDataId).remove();
    });
  })
}