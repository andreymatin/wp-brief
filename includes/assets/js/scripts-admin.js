  window.addEventListener('DOMContentLoaded', (event) => {

    /**
     * Convert Markdown Text
     */
    const wpbLog = document.querySelector('#wpbChangelog')
    const wpbDocs = document.querySelector('#wpbDocs')

    if (wpbLog && wpbDocs) {
      const wpbLogText = wpbLog.querySelector('.wpb-tabs-card__content')
      const wpbDocsText = wpbDocs.querySelector('.wpb-tabs-card__content')

      const converter = new showdown.Converter()

      let text = wpbLogText.innerHTML
      let html = converter.makeHtml(text)
      wpbLogText.innerHTML = html

      text = wpbDocsText.innerHTML
      html = converter.makeHtml(text)
      wpbDocsText.innerHTML = html
    }

    /**
     * Tabs
     */
    const wbpTabs = document.querySelectorAll('.wpb-tabs-links')
    if (wbpTabs) {
      wbpTabs.forEach((el) => {
        el.addEventListener('click', (e) => {
          e.preventDefault()
          const target = e.currentTarget

          // Active Tabs
          wbpTabs.forEach((el) => {
            el.classList.remove('active')
          })

          target.classList.add('active')

          const hash = target.hash
          const tab = document.querySelector(hash)

          if (tab) {
            const tabs = document.querySelectorAll('.wpb-tabs-card')
            tabs.forEach((el) => {
              el.classList.remove('active')
            })

            tab.classList.add('active')
          }
        })
      })
    }

    /**
     * Expand
     */
    const wpbExpand = document.querySelector('.wpb-expand')
    if (wpbExpand) {
      wpbExpand.addEventListener('click', (e) => {
        e.preventDefault()
        e.currentTarget.classList.add('hide')

        const wpbTabsContent = document.querySelectorAll(
          '.wpb-tabs-card__content'
        )

        if (wpbTabsContent) {
          wpbTabsContent.forEach((el) => {
            el.classList.add('expand')
          })
        }
      })
    }
  })

  /**
   * Upload Brand
   */
  jQuery(document).ready(function ($) {
    if (wp.media) {
      // Uploading files
      var file_frame
      var wp_media_post_id = wp.media.model.settings.post.id // Store the old id
      var set_to_post_id = $('#wpb_settings[brand]').val()

      jQuery('#wpbBtnUpload').on('click', function (event) {
        event.preventDefault()

        // If the media frame already exists, reopen it.
        if (file_frame) {
          // Set the post ID to what we want
          file_frame.uploader.uploader.param('post_id', set_to_post_id)
          // Open frame
          file_frame.open()
          return
        } else {
          // Set the wp.media post id so the uploader grabs the ID we want when initialised
          if (set_to_post_id) {
            wp.media.model.settings.post.id = set_to_post_id
          }
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
          title: 'Select a image to upload',
          button: {
            text: 'Use this image',
          },
          multiple: false, // Set to true to allow multiple files to be selected
        })

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
          // We set multiple to false so only get one image from the uploader
          attachment = file_frame.state().get('selection').first().toJSON()
          // Do something with attachment.id and/or attachment.url here
          $('#wpbImgPreview').attr('src', attachment.url)
          $('#wpb_settings\\[brand\\]').val(attachment.id)
          $('#wpbBtnRemove').addClass('active')
          $('.wpb-img-wrapper').addClass('active')

          // Restore the main post ID
          wp.media.model.settings.post.id = wp_media_post_id
        })

        // Finally, open the modal
        file_frame.open()
      })

      jQuery('#wpbBtnRemove').on('click', function (event) {
        $('#wpb_settings\\[brand\\]').val('')
        $('#wpbImgPreview').attr('src', '')
        $('#wpbBtnRemove').removeClass('active')
        $('.wpb-img-wrapper').removeClass('active')
      })

      // Restore the main ID when the add media button is pressed
      jQuery('a.add_media').on('click', function () {
        wp.media.model.settings.post.id = wp_media_post_id
      })
    }
  })

