/**
 * nodefinee url kas būs api.php
 *
 * tad ar request get metodi, mēs dabūjam api.php, un datus pārveidojam par response?
 * console log izvadām response lai redzētu kas ir api.php  kas ir response?
 * uztaisam mainiigos atlasot tos no html/php failiem  post template, content
 *
 */

/**request.get(url, function (response) {
  
   *uztaisa kopiju, kapēc? tapec ka pie template ir display none, bet kad ražo postus tas nav vajadzīgs
   
  for (const [property, value] of Object.entries(response.posts)) {
    let post_element = post_template.cloneNode(true);
    post_element.classList.remove("template");

    content.append(post_element);
  }
});
*/


let template = document.querySelector(".card.template");
let posts_wrapper = document.querySelector(".container");

function insertPost(post, append = true) {
  let post_element = template.cloneNode(true);
  post_element.classList.remove("template");
  if (append) {
    posts_wrapper.append(post_element);
  } else {
    posts_wrapper.prepend(post_element);
  }
  post_element.setAttribute("name", post.id);
  post_element.querySelector(".SKU").textContent = post.sku;
  post_element.querySelector(".name").textContent = post.name;
  post_element.querySelector(".price").textContent = post.price;

  if (!post.size == "") {
    post_element.querySelector(".size").textContent = post.size;
    post_element.querySelector(".label_dimensions").style.display = "none";
    post_element.querySelector(".label_weight").style.display = "none";
  }

  if (!post.height == "") {
    post_element.querySelector(".height").textContent = post.height;
    post_element.querySelector(".width").textContent = post.width;
    post_element.querySelector(".lenght").textContent = post.lenght;
    post_element.querySelector(".label_weight").style.display = "none";
    post_element.querySelector(".label_size").style.display = "none";
  }
  if (!post.weight == "") {
    post_element.querySelector(".weight").innerHTML = post.weight;
    post_element.querySelector(".label_dimensions").style.display = "none";
    post_element.querySelector(".label_size").style.display = "none";
  }
}

function thePost(url = "") {
  request.get(url, function (response) {
    if (!response.posts[0]) {
      return;
    }

    for (let post of response.posts) {
      insertPost(post);
    }
  });
}
thePost("api.php?api-name=posts");


let checkedCards = document.querySelectorAll(".card__checkbox");
console.log(checkedCards);

const delete_form = document.getElementsByClassName("mass-delete");

delete_form.onsubmit = function (event) {
  event.preventDefault();
  /** request post paņem elementu this, kas šajā gadījumā ir post form,
   *   un iekš action izsauc api new post*/
  request.post(this, function (response) {
    console.log(response);



    document.getElementById("sku").value = "";
   
  });
};