import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:formstate/model/form.dart';

class ViewData extends ChangeNotifier {
  final FormDataList = <FormData>[];

  Future<void> refresh() async {
    await _getDataFromFirebase();
  }

  addDataProvider() {
    _getDataFromFirebase();
  }

  Future<void> _getDataFromFirebase() async {
    FormDataList.clear();
    CollectionReference FormDataCollection =
        FirebaseFirestore.instance.collection('orang');
    QuerySnapshot FormDataSnapshot = await FormDataCollection.get();

    for (QueryDocumentSnapshot FormDataDoc in FormDataSnapshot.docs) {
      FormDataList.add(FormData(
        FormDataDoc.id,
        FormDataDoc['alamat'],
        FormDataDoc['no_hp'],
        FormDataDoc['pendidikan_terakhir'],
        FormDataDoc['nama'],
        FormDataDoc['nama_pekerjaan'],
        FormDataDoc['tahun'],
      ));
    }
  }
}
