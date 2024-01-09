public class Main {
    public static void main(String[] args)
    {
        OuterClassType1 outer = new OuterClassType1();
        outer.heyThere();

        OuterClassType1.InnerClassType1 inner = outer.new InnerClassType1();
        inner.innerMethod();

        OuterClassType1.InnerClassType2 inner2 = new OuterClassType1.InnerClassType2();
        inner2.innerMethod2();
    }

}
