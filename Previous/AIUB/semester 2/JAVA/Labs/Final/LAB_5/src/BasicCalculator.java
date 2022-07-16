public abstract class BasicCalculator implements Calculation{
    double value1;
    double value2;
    BasicCalculator(){}
    BasicCalculator(double v1, double v2){
        value1 = v1;
        value2 = v2;
    }

    void setValue1(double v1){
        value1 = v1;
    }
    void  setValue2(double v2){
        value2 = v2;
    }
    double getValue1(){
        return value1;
    }
    double getValue2(){
        return value2;
    }
}
