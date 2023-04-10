class FormData {
  String id;
  String alamat;
  String no_hp;
  String pendidikan_terakhir;
  String nama;
  List<Jenis> jenisList;

  FormData(
      {required this.id,
      required this.nama,
      required this.alamat,
      required this.no_hp,
      required this.pendidikan_terakhir,
      required this.jenisList});
  List<String> get jenisListString =>
      jenisList.map((jenis) => jenis.nama).toList();
}

class Jenis {
  String id;
  String nama;
  String tanggal;

  Jenis({required this.id, required this.nama, required this.tanggal});
}
