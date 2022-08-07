#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;

    if(n == 0){
        cout << 1 << endl; 
        return 0;
    }

    int e = 1;
    int f = 2;
    int t = 3;
    int s = 4;
    while(true){
        if(e == n){ cout << 8 << endl; break;}
        else if(f == n){ cout << 4 << endl; break;}
        else if(t == n){ cout << 2 << endl; break;}
        else if(s == n){ cout << 6 << endl; break;}
        e+=4;
        f+=4;
        t+=4;
        s+=4;
    }   

    // better solution if
    /*
      n mod 4 = 0  ------------> 8
      n mod 4 = 1  ------------> 4
      n mod 4 = 2  ------------> 2
      n mod 4 = 3  ------------> 6
    */
    
}