CKEDITOR.dialog.add( 'button_generatorDialog', function( editor ) {
  return {
    // Basic properties of the dialog window: title, minimum size.
    title: 'Button Shortcode Generator',
    minWidth: 400,
    minHeight: 300,
    // Dialog window contents definition.
    contents: [
      {
       // Definition of the Basic Settings dialog tab (page).
        id: 'tab-basic',
        label: 'Button Settings',
        // The tab contents.
        elements: [
         {
            // Text input field for the button text.
            type: 'text',
            id: 'button-text',
            label: 'Button Text',
            // Validation checking whether the field is not empty.
            validate: CKEDITOR.dialog.validate.notEmpty( "Button text field cannot be empty" )
          },
          {
            // Text input field for the button url.
            type: 'text',
            id: 'button-url',
            label: 'URL',
            validate: CKEDITOR.dialog.validate.notEmpty( "URL field cannot be empty" )
            }
          ]
      },
			{
				// Definition of the Design Settings dialog tab (page).
				id: 'tab-design',
				label: 'Button Design',
				// The tab contents.
				elements: [
				  {
						// Select input for button color.
						type: 'select',
						id: 'button-color',
						label: 'Button Color',
						items: [ 
              [ 'Blue', 'blue' ],
              [ 'Gold', 'gold' ],
              [ 'Black', 'black' ],
              [ 'Dark Gray', 'gray-dark' ],
              [ 'Light Gray', 'gray-light' ],
              [ 'White', 'white' ] 
            ],
            default: 'blue'
					},
					{
						// Select input field for the button size.
						type: 'select',
						id: 'button-size',
						label: 'Button Size',
						items: [ 
              [ 'Regular', 'regular' ],
              [ 'Large', 'large' ],
              [ 'Small', 'small' ]
            ],
            default: 'regular'
					},
					{
						// Select input field for the button size.
						type: 'select',
						id: 'button-style',
						label: 'Button Style',
						items: [ 
              [ 'Regular', 'regular' ],
              [ 'Full', 'full' ] 
            ],
            default: 'regular'
					}
				]
			},
		],
		onOk: function() {
			// The context of this function is the dialog object itself.
			// http://docs.ckeditor.com/#!/api/CKEDITOR.dialog
      const dialog = this;
			let buttonURL = dialog.getValueOf( 'tab-basic', 'button-url' );
			let buttonText = dialog.getValueOf( 'tab-basic', 'button-text' );
			let color = dialog.getValueOf( 'tab-design', 'button-color' );
		  let size = dialog.getValueOf( 'tab-design', 'button-size' );
      let style = dialog.getValueOf( 'tab-design', 'button-style' );

      // editor.insertHtml( '[button url="' + buttonURL + '"' + color + size + style + ']' + buttonText + '[/button]');
      editor.insertHtml(`<a class="button button-${color} button-${size} button-${style}" href="${buttonURL}"> ${buttonText} </a>`);
    }
  };
});