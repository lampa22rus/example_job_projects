const connection = require('../config')
const express = require('express')
const app = express()
class UserController {

	addUser(req, res) {

		let name = req.query.name;
		let login = req.query.login;
		let password = req.query.password
		console.log(name + password + login)
		connection.query("INSERT INTO `user` (`name`, `login`, `password`) VALUES ('" + name + "','" + login + "','" + password + "')", function (err, result) {
			res.json({ 'succes': 'добавлена новая запись' })
		})
	};
	SelectUser(req, res) {
		console.log('pfitk')
		let id = req.query.id;
		console.log(id)
		connection.query("SELECT * FROM `user` WHERE `id` = " + id + "", function (err, result) {
			res.json(result)
		})
	};
	UpdateUser(req, res) {
		let name = req.query.name;
		let id = req.query.id;
		connection.query('UPDATE `user` SET name=' + name + ' WHERE id =' + id, (error, result) => {

			if (error) throw error;
			console.log(req.body)
			res.json(result)
		})
	};
	DeleteUser(req, res) {
		let id = req.query.id;
		connection.query('DELETE FROM `user` WHERE id = ' + id, (error, result) => {

			if (error) throw error
			res.json(result)
		})
	}
	AllUser(req, res) {
		connection.query("SELECT * FROM `user`", function (err, result) {
			res.json(result)
		})
	};
}

module.exports = new UserController();