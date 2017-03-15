window.handleFileSelect = (evt) ->
  evt.stopPropagation()
  evt.preventDefault()
  if files = evt.target.files #click 
  else
    files = evt.dataTransfer.files  #drop  
  reader = new FileReader()
  reader.onload = (e) ->
    printImg(e.target.result)
  reader.readAsDataURL(files[0])


printImg = (data) ->
  img = document.createElement('img')
  img.setAttribute('src',data)
  document.getElementById('output').innerHTML = ''
  document.getElementById('output').insertBefore(img,null)
  img.onload = () ->
    if img.offsetWidth <= 700
        console.log('end')
        return true
     else 
        console.log('resample')
        Resample(data,700,null, printImg)


document.getElementById('userfile').addEventListener('change', handleFileSelect, false)
document.getElementById('dropzone').addEventListener('drop', handleFileSelect, false)

#respect to https://developer.mozilla.org/en-US/docs/Web/API/FileReader & http://ericbidelman.tumblr.com/