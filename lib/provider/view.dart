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
    notifyListeners();
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

  void showAlertDialog(BuildContext context, String id) {
    Widget cancelButton = TextButton(
      child: Text("Tidak"),
      onPressed: () {
        Navigator.pop(context);
      },
    );
    Widget continueButton = TextButton(
      child: Text("Ya"),
      onPressed: () async {
        await FirebaseFirestore.instance.collection('orang').doc(id).delete();
        Navigator.pop(context);
      },
    );

    AlertDialog alert = AlertDialog(
      title: Text("Hapus content"),
      content: Text("Apakah anda yakin ingin menghapus content ini?"),
      actions: [
        cancelButton,
        continueButton,
      ],
    );

    showDialog(
      context: context,
      builder: (BuildContext context) {
        return alert;
      },
    );
  }
}
