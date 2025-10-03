document.addEventListener('DOMContentLoaded', () => {
  const file = document.getElementById('image');
  if (!file) return;

  file.addEventListener('change', () => {
    const f = file.files[0];
    if (!f) return;

    const okExt = ['jpg','jpeg','png','gif','webp'];
    const ext = f.name.split('.').pop().toLowerCase();
    if (!okExt.includes(ext)) {
      alert('Only jpg/jpeg/png/gif/webp are allowed.');
      file.value = '';
      return;
    }

    const max = 5 * 1024 * 1024; // 5MB
    if (f.size > max) {
      alert('Image too large (max 5MB).');
      file.value = '';
    }
  });
});
