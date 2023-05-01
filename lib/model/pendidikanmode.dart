import 'package:cloud_firestore/cloud_firestore.dart';

class PendidikanModel {
  String id;
  List<dynamic> pendidikan;

  PendidikanModel({
    required this.id,
    required this.pendidikan,
  });

  factory PendidikanModel.fromFirestore(DocumentSnapshot doc) {
    Map data = doc.data() as Map<String, dynamic>;
    return PendidikanModel(
      id: doc.id,
      pendidikan: [],
    );
  }
}
