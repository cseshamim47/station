public class ScientificCalculator extends BasicCalculator implements ScientificCalculation{

    ScientificCalculator(){}
    ScientificCalculator(double v1, double v2){
        super(v1,v2);
    }

    public double add(){
        return getValue1() + getValue2();
    }
    public double subtract(){
        if(getValue2() > getValue1()) return getValue2() - getValue1();
        else return getValue1() - getValue2();
    }
    public double multiply(){
        return getValue1() * getValue2();
    }
    public double divide(){
        if(getValue2() > getValue1()) return getValue2()/getValue1();
        else return getValue1()/getValue2();
    }

    public double toThePow() {
        return Math.pow(getValue1(), getValue2());
    }
}
