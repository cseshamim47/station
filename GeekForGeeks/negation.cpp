#include <iostream>
using namespace std;

int main()
{
     int x = 1;
     cout << (~x) << endl; // formula : 2^31 - 1 - n
     x = 5;                // will print 2s complement which is -1-n
     cout << (~x) << endl;
     return 0;   
}