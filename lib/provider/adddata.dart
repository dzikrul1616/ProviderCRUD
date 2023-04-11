import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:formstate/model/form.dart';

class addDataProvider extends ChangeNotifier {
  final _FormDataList = <FormData>[];
  TextEditingController namaController = TextEditingController();
  TextEditingController nohpController = TextEditingController();
  TextEditingController alamatController = TextEditingController();
  TextEditingController namapekerjaanController = TextEditingController();
  TextEditingController tahunController = TextEditingController();
  List<dynamic> listpekerjaan = [];
  List<dynamic> listtahun = [];
  List<String> listsemua = [];
  String? selectedPendidikan;

  void valueList(String? value) {
    notifyListeners();
    selectedPendidikan = value;
    notifyListeners();
  }

  void addPekerjaan() {
    listpekerjaan.add(namapekerjaanController.text);
    listtahun.add(tahunController.text);
    listsemua
        .add('${namapekerjaanController.text} (${tahunController.text} tahun)');
    notifyListeners();
    namapekerjaanController.clear();
    tahunController.clear();
    notifyListeners();
  }

  void addDataToFirebase() async {
    CollectionReference pasarCollection =
        FirebaseFirestore.instance.collection('orang');

    DocumentReference pasarDocRef = await pasarCollection.add({
      'nama': namaController.text ?? 'tidak terinput',
      'no_hp': nohpController.text ?? 'tidak terinput',
      'alamat': alamatController.text ?? 'tidak terinput',
      'pendidikan_terakhir': selectedPendidikan,
      'nama_pekerjaan': listpekerjaan,
      'tahun': listtahun,
    });
  }

  delete(int index) {
    listpekerjaan.removeAt(index);
    listsemua.removeAt(index);
    listtahun.removeAt(index);
    notifyListeners();
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
