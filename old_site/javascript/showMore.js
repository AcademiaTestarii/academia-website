
function showMore()
{
    var info = document.getElementById('btn-more');
   if(info.innerHTML==="Show more")
   {
       document.getElementById('hid1').style.display = 'none';
       info.innerHTML = "Show less";
   }
}