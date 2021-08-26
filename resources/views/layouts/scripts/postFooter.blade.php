<script type="text/javascript">
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // send contact form data.
    function postFooter(uniqueid, url){
      fetch(url, {
          headers: {
              "Content-Type": "application/json",
              "Accept": "application/json, text-plain, */*",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": token
          },
              method: 'post',
              credentials: "same-origin",
              body: JSON.stringify({
                      uuid : uniqueid
              })
          })
    }

    function postFooterFollowUser(username, url){
      fetch(url, {
          headers: {
              "Content-Type": "application/json",
              "Accept": "application/json, text-plain, */*",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": token
          },
              method: 'post',
              credentials: "same-origin",
              body: JSON.stringify({
                      name : username
              })
          })
    }
</script>
