const form = document.getElementById('formContacts')
const popup = document.getElementById('popup')

form.addEventListener('submit', function (e) {
      e.preventDefault()

      popup.classList.remove('opacity-0', 'pointer-events-none')
      popup.classList.add('opacity-100')
      setTimeout(() => {
        popup.classList.remove('opacity-100')
        popup.classList.add('opacity-0', 'pointer-events-none')
      }, 2500)
})