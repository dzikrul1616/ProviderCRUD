import 'dart:convert';

List<ModelUser> modelUserFromJson(String str) =>
    List<ModelUser>.from(json.decode(str).map((x) => ModelUser.fromJson(x)));

String modelUserToJson(List<ModelUser> data) =>
    json.encode(List<dynamic>.from(data.map((x) => x.toJson())));

class ModelUser {
  int? id;
  String? nama;
  String? alamat;
  String? pendidikan;
  String? phone;
  List<Pekerjaan>? pekerjaan;

  ModelUser({
    this.id,
    this.nama,
    this.alamat,
    this.pendidikan,
    this.phone,
    this.pekerjaan,
  });

  ModelUser.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    nama = json['nama'];
    alamat = json['alamat'];
    pendidikan = json['pendidikan'];
    phone = json['phone'];

    if (json['pekerjaan'] != null) {
      pekerjaan = <Pekerjaan>[];
      json['pekerjaan'].forEach((v) {
        pekerjaan!.add(Pekerjaan.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['nama'] = nama;
    data['alamat'] = alamat;
    data['pendidikan'] = pendidikan;
    data['phone'] = phone;
    if (pekerjaan != null) {
      data['pekerjaan'] = pekerjaan!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class Pekerjaan {
  int? id;
  String? pekerjaan;
  int? userId;
  String? waktu;

  Pekerjaan({
    this.id,
    this.pekerjaan,
    this.userId,
    this.waktu,
  });

  Pekerjaan.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    pekerjaan = json['pekerjaan'];
    userId = json['user_id'];
    waktu = json['waktu'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['pekerjaan'] = pekerjaan;
    data['user_id'] = userId;
    data['waktu'] = waktu;
    return data;
  }
}
