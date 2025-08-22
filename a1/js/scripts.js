(function(){
  var grid = document.getElementById('galleryGrid');
  var modal = document.getElementById('imageModal');
  if(grid && modal){
    var modalImg = document.getElementById('modalImage');
    var modalTitle = document.getElementById('imageModalLabel');
    grid.addEventListener('click', function(e){
      var a = e.target.closest('a.gallery-item');
      if(!a) return;
      modalImg.src = a.getAttribute('href');
      modalImg.alt = a.getAttribute('data-title') || 'Image';
      modalTitle.textContent = a.getAttribute('data-title') || 'Image';
    });
  }
})();

(function(){
  var form = document.getElementById('addSkillForm');
  if(!form) return;
  form.addEventListener('submit', function(e){
    var ok = form.checkValidity();
    var fileInput = document.getElementById('image');
    var allowed = ['jpg','jpeg','png','gif','webp'];
    if(fileInput && fileInput.files.length){
      var name = fileInput.files[0].name.toLowerCase();
      var ext = name.split('.').pop();
      if(allowed.indexOf(ext) === -1){
        ok = false;
        alert('Invalid file type. Allowed: ' + allowed.join(', '));
      }
    }
    if(!ok){
      e.preventDefault();
      e.stopPropagation();
    }
  });
})();
