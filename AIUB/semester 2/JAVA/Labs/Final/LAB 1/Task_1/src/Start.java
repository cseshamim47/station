public class Start {
    public static void main(String[] args) {
        Teacher empty = new Teacher();
        Teacher one = new Teacher("Human","Sifat Rahman Ahona","Female",25,"14-141414","CS Department head");

        empty.setTeacherId("20212021");
        empty.setTeacherDesignation("Math teacher");
        empty.setName("Kuddus Ali");
        empty.setType("SuperMan");
        empty.setGender("Male");
        empty.setAge(50);

//        System.out.println(empty.getType());
//        System.out.println(empty.getName());
//        System.out.println(empty.getGender());
//        System.out.println(empty.getAge());
//        System.out.println(empty.getTeacherId());
//        System.out.println(empty.getTeacherDesignation());

        one.Display();
        System.out.println();
        empty.Display();
    }
}
