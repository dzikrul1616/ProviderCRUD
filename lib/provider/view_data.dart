import 'dart:convert';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:formstate/model/model_user.dart';
import 'package:http/http.dart' as http;
import '../const/api.dart';

class ViewData extends ChangeNotifier {
  List<dynamic> users = [];
  bool isLoading = true;
  bool get _isLoading => isLoading;
  ViewData() {
    getDataid();
  }

  Future<void> getDataid() async {
    isLoading = true;
    notifyListeners();
    try {
      final response = await http.get(Uri.parse(ApiConfig.usersID));

      if (response.statusCode == 200) {
        final user = jsonDecode(response.body)['data'];
        users = user;
        isLoading = false;
        notifyListeners();
        return user;
      } else {
        throw Exception('${response.statusCode}');
      }
    } catch (error) {
      print(error);
      Fluttertoast.showToast(msg: '${error}', backgroundColor: Colors.red);
    }
  }

  Future<void> refresh() async {
    await getDataid();
  }

  Future<void> deleteData(int id) async {
    final url = Uri.parse(ApiConfig.usersID + '${id}');
    final response = await http.delete(url, body: {"id": id.toString()});
    final data = jsonDecode(response.body);
    String pesan = data['message'];
    try {
      if (response.statusCode == 200) {
        getDataid();
        Fluttertoast.showToast(
            msg: '${data['message']}', backgroundColor: Colors.green);
      } else {
        Fluttertoast.showToast(
            msg: '${data['message']}', backgroundColor: Colors.red);
      }
    } catch (e) {
      Fluttertoast.showToast(msg: '${e}', backgroundColor: Colors.red);
      print(id);
    }
  }
}
