import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:formstate/model/form.dart';

class addDataProvider extends ChangeNotifier {
  final _FormDataList = <FormData>[];
  TextEditingController namaController = TextEditingController();
  TextEditingController nohpController = TextEditingController();
  TextEditingController alamatController = TextEditingController();
  TextEditingController namapekerjaanController = TextEditingController();
  String? selectedPendidikan;

  void valueList(String? value) {
    notifyListeners();
    selectedPendidikan = value;
    notifyListeners();
  }

  void addPekerjaan() async {
    CollectionReference pasarCollection =
        FirebaseFirestore.instance.collection('orang');
    DocumentReference pasarDocRef =
        (await pasarCollection.get(
          
        )) as DocumentReference<Object?>;
    CollectionReference jenisCollection = pasarDocRef.collection('pekerjaan');

    namapekerjaanController.clear();
    await jenisCollection.add({
      'nama_pekerjaan': namapekerjaanController.text,
    });
  }

  void addDataToFirebase() async {
    CollectionReference pasarCollection =
        FirebaseFirestore.instance.collection('orang');

    DocumentReference pasarDocRef = await pasarCollection.add({
      'nama': namaController.text ?? 'tidak terinput',
      'no_hp': nohpController.text ?? 'tidak terinput',
      'alamat': alamatController.text ?? 'tidak terinput',
      'pendidikan_terakhir': selectedPendidikan ?? 'tidak terinput',
    });

    CollectionReference jenisCollection = pasarDocRef.collection('pekerjaan');
    await jenisCollection.add({
      'nama_pekerjaan': namapekerjaanController.text,
      'tahun': '2002',
    });
  }

  void dispose() {
    namaController.dispose();
    nohpController.dispose();
    alamatController.dispose();
    alamatController.dispose();
    namapekerjaanController.dispose();
    super.dispose();
  }

  final List<String> pendidikanList = [
    'smp',
    'sma',
    'smk',
    'd1',
    'd2',
    'd3',
    'd4',
    's1',
    's2',
    's3',
  ];
}
