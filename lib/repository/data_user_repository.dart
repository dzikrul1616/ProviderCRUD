import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:formstate/model/model_user.dart';
import 'package:http/http.dart' as http;
import '../const/api.dart';

class DataUserRepository {
  Future<List<ModelUser>?> getDataUser() async {
    final response = await http.get(Uri.parse(ApiConfig.users));
    try {
      if (response.statusCode == 200) {
        print(response.statusCode);
        final dataResponse = jsonDecode(response.body)['data'];
        print(dataResponse);
        List<ModelUser> data = dataResponse
            .map<ModelUser>((item) => ModelUser.fromJson(item))
            .toList();
        return data;
      } else {
        print(response.statusCode);
        throw Exception('${response.statusCode}');
      }
    } catch (e) {
      print(e);
    }
  }

  Future<void> deleteData(id) async {
    final url = Uri.parse(ApiConfig.usersID + '${id}');
    final response = await http.delete(url, body: {"id": id.toString()});
    final data = jsonDecode(response.body);
    try {
      if (response.statusCode == 200) {
        print(id);
        Fluttertoast.showToast(
            msg: '${data['message']}', backgroundColor: Colors.green);
      } else {
        print(id);
        Fluttertoast.showToast(
            msg: '${data['message']}', backgroundColor: Colors.red);
      }
    } catch (e) {
      Fluttertoast.showToast(msg: '${e}', backgroundColor: Colors.red);
      print(id);
      return null;
    }
  }
}
