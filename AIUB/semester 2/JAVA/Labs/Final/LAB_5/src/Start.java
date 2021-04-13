public class Start {
    public static void main(String[] args) {
        ScientificCalculator empty = new ScientificCalculator();
        ScientificCalculator objOne = new ScientificCalculator(4,2);

        objOne.setValue1(8);
        objOne.setValue2(2);

        System.out.println("-----------------------------------------");
        System.out.println("Value one : " + objOne.getValue1());
        System.out.println("Value two : " + objOne.getValue2());
        System.out.println("Addition : " + objOne.add());
        System.out.println("Subtraction : " + objOne.subtract());
        System.out.println("Multiplication : " + objOne.multiply());
        System.out.println("Divide : " + objOne.divide());
        System.out.println(objOne.getValue1() + " to the power " + objOne.getValue2() + " is equals to : " + objOne.toThePow());

    }
}
