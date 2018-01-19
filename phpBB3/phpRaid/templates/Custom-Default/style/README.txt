*****************************************************************
****             HOW TO CREATE A NEW TEMPLATE                ****
*****************************************************************
Creator: 	Faldan@Voljin 										*
Date: 		22/05/2017       									*
*****************************************************************

************************
* DISCLAIMER
************************

The templates has been done for the custom php Raider i made to support boostrap v4.
It will not work with standard phpRaider.
Code should be not so bad but i'm not a web developper ;)

************************
* HOW TO
************************

Step 1 -> Copy Legion-Y template and rename it as <YourName> (the name of your new template)
------------------------------------------------------------------------------------------------------------------------
Step 2 -> Go to <YourName>\images\backgrounds
	Step 2.1 -> replace bg-legion-top.jpg with the background img you want (other img are not used in this template)
	Step 2.2 -> you can add any other background to fill high vertical resolution if you want (like bg-Legion-repeat.jpg)
				but you will have to add it in the custom-wow.css
	/!\ Try to use img with same width/height
	/!\ change img name in Step6 in css
------------------------------------------------------------------------------------------------------------------------
Step 3 -> Go to <YourName>\images\banners
	Step 3.1 -> replace Legion-glass.jpg with the banner img you want
	Step 3.2 -> replace Legion-resp.jpg with the banner img for responsive design you want (phone, ..) 
	/!\ Try to use img with same width/height
	/!\ Keep same name or change css in step6
------------------------------------------------------------------------------------------------------------------------
Step 4 -> Go to <YourName>\images\guild
	Step 4.1 -> replace guild_logo.png with the logo img of your guild
	Step 4.1 -> replace guild_logo_resp.png with the logo img of your guild (both img are the same in my case, juste different name)
	/!\ Try to use img with same width/height
	/!\ Keep same name or change css in step6
------------------------------------------------------------------------------------------------------------------------
Step 5 -> Go to <YourName>\images\icones
	Step 4.1 -> replace ui-icons_orange_normal.png with the same file recolored with your theme (use photoshop or any similar prog)
	Step 4.1 -> replace ui-icons_orange_hover.pngg with the same file recolored with your theme (use photoshop or any similar prog)
	/!\ Try to use img with same width/height
	/!\ change img name in Step6 in css
------------------------------------------------------------------------------------------------------------------------
Step 6 -> Go to <YourName>\style
	Step 6.1 -> modify custom-wow.css to create your skin:
		- easy way is to use custom-wow-easy.css which split css between what you should probably modify (meaning most color not black
		or whithe) and what is mostly use for depth/standard text color, ....
		- normal way is by doing the same with custom-wow.css which sort css by type (background, border-color, color, ...)
------------------------------------------------------------------------------------------------------------------------
Step 7 -> optimize img and css
	Step7.1: for css, go to https://cssminifier.com/
	Step7.2: for jpeg, go to https://www.jpeg.io/
	Step7.3: for png, go to https://compressor.io/compress
	Step7.4: for js, go to https://jscompress.com/
	
************************
* Template description
************************
<YourName>\fonts
	contains some specific fonts like the material-icon (google) and wow one which is use on blizzard site
--------------------------------------
<YourName>\framework
	contains css from "framework" i'm using in this template / custom phpraider:
		- boostrap v4 (beta)
		- jquery-ui
		- meterial-icon
--------------------------------------
<YourName>\js
	contains css use to activate popover/modal/... from boostrap
--------------------------------------
<YourName>\images\backgrounds
	contains all the background img
<YourName>\images\banners
	contains all the banner img
<YourName>\images\guild
	contains all the guild logo img
<YourName>\images\icones
	contains all the icones use by jquery calendar (the one which pop when you choose a date for a raid)
--------------------------------------
<YourName>\style
	custom-phpraider.css / custom-phpraider.min.css
		Main css for the template. It contains all the css definitions use in the template with default color.
		(It is the one use in Custom-default theme)
		It shouldn't be modified
	custom-wow.css / custom-wow.min.css
		Theme css. It contains all the css definitions for the current theme: mainly color, outline, shadow ...
		This is the css you should modify
	custom-wow-esay.css
		Same as custom-wow.css but organize with what you probably will modified first (at the beginning of the file), then what is 
		mainly use for depth, standard text, ...
		It's just here to help creating custom-wow.css
