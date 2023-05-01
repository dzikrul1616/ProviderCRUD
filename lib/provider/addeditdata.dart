import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:formstate/model/form.dart';
import 'package:formstate/model/modeluser.dart';

import '../model/pendidikanmode.dart';

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

  bool change = true;

  addDataProvider(id) {
    if (id != '') {
      change = false;
      notifyListeners();
      getDataid(id!);
      namaController.text = DataList.nama;
      alamatController.text = DataList.alamat;
      nohpController.text = DataList.nomorHp;
      selectedPendidikan = DataList.pendidikan;
      listsemua = DataList.listsemua;
      listpekerjaan = listpekerjaan;
      listtahun = listtahun;
    } else {
      change = true;
      notifyListeners();
      namaController.text = '';
      alamatController.text = '';
      nohpController.text = '';
      listsemua = [];
    }
    pendidikanList();
  }

  void valueList(String? value) {
    notifyListeners();
    selectedPendidikan = value;
    notifyListeners();
  }

  void addPekerjaan() {
    listpekerjaan.add(namapekerjaanController.text);
    listtahun.add(tahunController.text);
    listsemua.add('${namapekerjaanController.text} ${tahunController.text}');
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

  Future<void> updateDataToFirebase(id) async {
    await FirebaseFirestore.instance.collection('orang').doc(id).update({
      'nama': namaController.text,
      'no_hp': nohpController.text,
      'alamat': alamatController.text,
      'pendidikan_terakhir': selectedPendidikan,
      'nama_pekerjaan': listpekerjaan,
      'tahun': listtahun,
    });
  }

  void delete(int index) {
    listpekerjaan.removeAt(index);
    listsemua.removeAt(index);
    listtahun.removeAt(index);
    notifyListeners();
  }

  Future<List<String>> pendidikanList() async {
    List<String> pendidikan = [];
    QuerySnapshot snapshot =
        await FirebaseFirestore.instance.collection('pendidikan').get();
    snapshot.docs.forEach((doc) {
      Map<String, dynamic> data = doc.data() as Map<String, dynamic>;
      List<dynamic> pendidikanData = data['pendidikan'] ?? [];
      pendidikan.addAll(pendidikanData.cast<String>());
    });
    return pendidikan;
  }

  final FormDataList = <FormData>[];

  void deleteData(String id) async {
    await FirebaseFirestore.instance.collection('orang').doc(id).delete();
  }

  ModelUser DataList = ModelUser(
      id: '',
      nama: '',
      alamat: '',
      nomorHp: '',
      pendidikan: '',
      listsemua: [],
      listpekerjaan: [],
      listtahun: []);
  void getDataid(id) async {
    await FirebaseFirestore.instance
        .collection('orang')
        .doc(id)
        .get()
        .then((DocumentSnapshot document) {
      if (document.exists) {
        DataList = ModelUser.fromFirestore(document);
        namaController.text = DataList.nama;
        alamatController.text = DataList.alamat;
        nohpController.text = DataList.nomorHp;
        selectedPendidikan = DataList.pendidikan;
        listsemua = DataList.listsemua;
        listpekerjaan = DataList.listpekerjaan;
        listtahun = DataList.listtahun;
      }
    });
  }
}
