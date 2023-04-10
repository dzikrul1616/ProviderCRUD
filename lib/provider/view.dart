import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:formstate/model/form.dart';

class ViewData extends ChangeNotifier {
  final FormDataList = <FormData>[];

  Future<void> refresh() async {
    await _getDataFromFirebase();
  }

  ViewData() {
    _getDataFromFirebase();
  }

  Future<void> _getDataFromFirebase() async {
    FormDataList.clear();
    CollectionReference FormDataCollection =
        FirebaseFirestore.instance.collection('orang');
    QuerySnapshot FormDataSnapshot = await FormDataCollection.get();

    for (QueryDocumentSnapshot FormDataDoc in FormDataSnapshot.docs) {
      CollectionReference jenisCollection =
          FormDataDoc.reference.collection('pekerjaan');
      QuerySnapshot jenisSnapshot = await jenisCollection.get();
      List<Jenis> jenisList = [];

      for (QueryDocumentSnapshot jenisDoc in jenisSnapshot.docs) {
        jenisList.add(Jenis(
          id: jenisDoc.id,
          nama: jenisDoc['nama_pekerjaan'],
          tanggal: jenisDoc['tahun'],
        ));
      }

      FormDataList.add(FormData(
        id: FormDataDoc.id,
        alamat: FormDataDoc['alamat'],
        no_hp: FormDataDoc['no_hp'],
        pendidikan_terakhir: FormDataDoc['pendidikan_terakhir'],
        nama: FormDataDoc['nama'],
        jenisList: jenisList,
      ));
    }
  }

  Future<void> delete(String id) async {
    await FirebaseFirestore.instance.collection('orang').doc(id).delete();
  }
}
