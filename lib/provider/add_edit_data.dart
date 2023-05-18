import 'dart:convert';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:formstate/const/api.dart';
import 'package:formstate/model/model_user.dart';
import 'package:http/http.dart' as http;
import '../model/form_data.dart';

class AddDataProvider extends ChangeNotifier {
  TextEditingController namaController = TextEditingController();
  TextEditingController nohpController = TextEditingController();
  TextEditingController alamatController = TextEditingController();
  TextEditingController namapekerjaanController = TextEditingController();
  TextEditingController tahunController = TextEditingController();
  List<dynamic> pekerjaan = [];
  List<dynamic> waktu = [];
  List<dynamic> listPekerjaan = [];
  List<String> listSemua = [];
  String? selectedPendidikan;
  List pendidikana = [];
  ModelUser dataList = ModelUser(
      id: '', nama: '', alamat: '', phone: '', pendidikan: '', pekerjaan: []);
  Pekerjaan kerja1 = Pekerjaan(pekerjaan: '', waktu: '');
  bool change = true;
  
  AddDataProvider(id) {
    if (id != '') {
      change = false;
      notifyListeners();
      getDataid(id);
      getPekrjaid(id);
      namaController.text = dataList.nama!;
      alamatController.text = dataList.alamat!;
      nohpController.text = dataList.phone!;
      selectedPendidikan = dataList.pendidikan;
      listPekerjaan = dataList.pekerjaan!;
      listSemua = ['${kerja1.pekerjaan} ${kerja1.waktu}'];
    } else {
      change = true;
      notifyListeners();
      namaController.text = '';
      alamatController.text = '';
      nohpController.text = '';
      listPekerjaan = [];
      listSemua = [];
    }
    pendidikanList();
  }

  void valueList(String? value) {
    if (pendidikana.contains(value)) {
      selectedPendidikan = value;
    } else {
      selectedPendidikan = pendidikana.first;
    }
    notifyListeners();
  }

  void addPekerjaan(id) {
    if (id != '') {
      Pekerjaan newPekerjaan = Pekerjaan(
        pekerjaan: namapekerjaanController.text,
        waktu: tahunController.text,
      );
      pekerjaan.add(newPekerjaan);
      waktu.add(tahunController.text);
      listPekerjaan.add(newPekerjaan);
      notifyListeners();
    } else {
      Pekerjaan newPekerjaan = Pekerjaan(
        pekerjaan: namapekerjaanController.text,
        waktu: tahunController.text,
      );
      listPekerjaan.add(newPekerjaan);
      listSemua.add(newPekerjaan.toString());
      namapekerjaanController.clear();
      tahunController.clear();
      notifyListeners();
    }
  }

  Future<void> addDataPekerja() async {
    final url = Uri.parse(ApiConfig.users);
    try {
      final response = await http.post(
        url,
        headers: {'Content-Type': 'application/json'},
        body: json.encode({
          'nama': namaController.text,
          'phone': nohpController.text,
          'alamat': alamatController.text,
          'pendidikan': selectedPendidikan,
          'pekerjaan': listPekerjaan
              .map((p) => {'pekerjaan': p.pekerjaan, 'waktu': p.waktu})
              .toList()
        }),
      );
      if (response.statusCode == 200) {
        final data = json.decode(response.body);
        final message = data['message'];
        Fluttertoast.showToast(
            msg: '${message}', backgroundColor: Colors.green);
        print(message);
      } else {}
    } catch (error) {
      print('Error: $error');
    }
  }

  Future<void> editDataPekerja(id) async {
    final url = Uri.parse(ApiConfig.usersID + '${id}');
    try {
      final response = await http.post(
        url,
        headers: {'Content-Type': 'application/json'},
        body: json.encode({
          'nama': namaController.text,
          'phone': nohpController.text,
          'alamat': alamatController.text,
          'pendidikan': selectedPendidikan,
          'pekerjaan': listPekerjaan
              .map((p) => {'pekerjaan': p.pekerjaan, 'waktu': p.waktu})
              .toList(),
        }),
      );
      if (response.statusCode == 200) {
        final data = json.decode(response.body);
        String message = data['message'];
        Fluttertoast.showToast(
            msg: '${message}', backgroundColor: Colors.green);
        print(message);
      } else {}
    } catch (error) {
      print('Error: $error');
    }
  }

  void delete(int index, id) {
    if (id != '') {
      listPekerjaan.removeAt(index);
      notifyListeners();
    } else {
      listPekerjaan.removeAt(index);
      pekerjaan.remove(index);
      waktu.remove(index);
      listSemua.removeAt(index);
      notifyListeners();
    }
  }

  
  Future<void> pendidikanList() async {
    List<String> pendidikan = [];
    QuerySnapshot snapshot =
        await FirebaseFirestore.instance.collection('pendidikan').get();
    snapshot.docs.forEach((doc) {
      Map<String, dynamic> data = doc.data() as Map<String, dynamic>;
      List<dynamic> pendidikanData = data['pendidikan'] ?? [];
      pendidikan.addAll(pendidikanData.cast());
    });
    pendidikana = pendidikan.toSet().toList();

    notifyListeners();
  }


  getDataid(String id) async {
    try {
      final response = await http.get(Uri.parse(ApiConfig.usersID + id));
      if (response.statusCode == 200) {
        final user = jsonDecode(response.body)['data'];
        List<Pekerjaan> pekerjaanList = [];
        for (var item in user['pekerjaan']) {
          pekerjaanList.add(Pekerjaan(
            pekerjaan: item['pekerjaan'].toString(),
            waktu: item['waktu'].toString(),
          ));
        }
        dataList = ModelUser(
          nama: user['nama'],
          alamat: user['alamat'],
          phone: user['phone'],
          pendidikan: user['pendidikan'],
          pekerjaan: pekerjaanList,
        );

        namaController.text = dataList.nama!;
        alamatController.text = dataList.alamat!;
        nohpController.text = dataList.phone!;
        selectedPendidikan = dataList.pendidikan;
        listPekerjaan = dataList.pekerjaan!;

        notifyListeners();
      } else {
        throw Exception('${response.statusCode}');
      }
    } catch (error) {
      Fluttertoast.showToast(msg: '${error}', backgroundColor: Colors.red);
    }
  }

  getPekrjaid(String id) async {
    try {
      final response = await http.get(Uri.parse(ApiConfig.usersID + id));
      if (response.statusCode == 200) {
        final user = jsonDecode(response.body);
        final pekerjaan = user['data']['pekerjaan'];
        final waktu = user['data']['waktu'];
        kerja1 = Pekerjaan(pekerjaan: pekerjaan, waktu: waktu);
        namapekerjaanController.text = kerja1.pekerjaan!;
        tahunController.text = kerja1.waktu!;
        listSemua.add('${kerja1.pekerjaan} ${kerja1.waktu}');
        notifyListeners();
        print(user);
      } else {
        throw Exception('${response.statusCode}');
      }
    } catch (error) {}
  }
}
