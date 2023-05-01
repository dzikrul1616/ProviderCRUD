import 'package:cloud_firestore/cloud_firestore.dart';

class ModelUser {
  String id;
  String nama;
  String alamat;
  String nomorHp;
  String pendidikan;
  List<String> listsemua;
  List<dynamic> listpekerjaan;
  List<dynamic> listtahun;

  ModelUser({
    required this.id,
    required this.nama,
    required this.alamat,
    required this.nomorHp,
    required this.pendidikan,
    required this.listsemua,
    required this.listpekerjaan,
    required this.listtahun,
  });

  factory ModelUser.fromFirestore(DocumentSnapshot doc) {
    Map data = doc.data() as Map<String, dynamic>;
    return ModelUser(
      id: doc.id,
      nama: data['nama'],
      alamat: data['alamat'],
      nomorHp: data['no_hp'],
      pendidikan: data['pendidikan_terakhir'],
      listsemua: [],
      listpekerjaan: [],
      listtahun: [],
    );
  }
}
