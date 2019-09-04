 function unsub(delid)
 {
 if(confirm("Are you sure you want to unsubscribe to this article?")){
 window.location.href='unsubscribe.php?id=' +delid+'';
 alert("You have unsubscribed to this article")
 return true;
 }
 } 