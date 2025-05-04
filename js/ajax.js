const form_ajax = document.querySelectorAll ( ".FormAjax" ) ;

function sendFormAjax ( e ) {
    e.preventDefault (  ) ;

    let send = confirm ( " Do you want to send this form? " ) ;

    if ( send === true ) {
        let data = new FormData (this) ;
        let method = this.getAttribute ( "method" );
        let action = this.getAttribute ( "action" );

        let header = new Headers() ;

        let config = {
             method : method
            ,headers : header
            ,mode : 'cors'
            ,cache : 'no-cache'
            ,body : data
        } ;

        fetch ( action , config )
        .then ( answer => answer.text () )
        .then ( answer => {
            let container = document.querySelector ( ".form-rest" ) ;
            container.innerHTML = answer ; 
        } ) ; 
        

    }
}

form_ajax.forEach ( forms => {
    forms.addEventListener ( "submit" , function ( e ) {
        sendFormAjax.call ( this , e ) ; 
    } ) ;
} ) ;




document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.notification').forEach(($notification) => {
      const $delete = $notification.querySelector('.delete');
      if ($delete) {
        $delete.addEventListener('click', () => {
          $notification.remove();
        });
      }
  
      setTimeout(() => {
        $notification.remove();
      }, 5000);
    });
  });