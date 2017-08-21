v 1.2
added request field [get_file] returns current image data.

v 1.1
if request field [last_file] is not specified, returns first image data.

v 1.0.
now we use xmlhttprequest to transfer data from server.


Request can contain field [last_file]. In such case next image data is returned. Otherwise, it returns next image data according to internal counter. 


Response is in JSON format: 
base64-coded image [image]
image name [name]


v.0.1
returns next image from images directory. 
Call via url like:
```
<img src="script-url">
```

By default images are stored in "images" sub-dir. Or, change path in line #2

