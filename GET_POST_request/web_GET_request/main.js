$(document).ready(function () {
	$('.btn').click(function (e) {
		$.ajax({
			url: 'https://63223769fd698dfa29090f85.mockapi.io/lesson/rest',
			method: 'get',
			get: 'json',
			success: function (data) {
				for (i = 0; i < data.length; i++) {
					let div = document.createElement('div')
					div.classList.add('cards')
					div.innerHTML = '<div class=_id>' + data[i]._id + '</div>'
					container_main.append(div)
					cards = document.querySelectorAll('.cards')
					cards[i].innerHTML += '<div class=user>'
					cards[i].innerHTML += '<img src=' + data[i].picture + '>'
					cards[i].innerHTML += '<div class=name>' + data[i].name + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=age>Возраст: ' + data[i].age + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=gender>' + data[i].gender + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=company>' + data[i].company + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=email>' + data[i].email + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=phone>' + data[i].phone + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=address>' + data[i].address + '</div>' + '<br>'
					cards[i].innerHTML += '<div class=about>' + data[i].about + '</div>' + '<br>'
					friends = data[i].friends
					$.each(friends, function (index, item) {
						cards[i].innerHTML += '<div class="friends">' + item.id + ' ' + item.name + '</div>'
					})
				}
			}
		})
		e.preventDefault();
	})

})

