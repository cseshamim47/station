#include <iostream>
#include <math.h>
#include <iomanip>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define PI 3.141592653589793

double dist(double a, double b)
{
    return sqrt(sq(a)+sq(b));
}


void solve()
{
    double x1,y1,x2,y2,x3,y3;
    while(cin >> x1 >> y1 >> x2 >> y2 >> x3 >> y3)
    {
        double a = dist((x2-x1),(y2-y1)); // distance between two points
        double b = dist((x3-x1),(y3-y1));
        double c = dist((x3-x2),(y3-y2));

        double p = (a+b+c)/2.00;
        double A = sqrt(p*(p-a)*(p-b)*(p-c)); // heron's formula to calculate area

        double r = (a*b*c)/(4.00*A); // circumcircle radius formula

        cout << fixed << setprecision(2) << (2.00*PI*r) << endl;

    }
}

int main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}