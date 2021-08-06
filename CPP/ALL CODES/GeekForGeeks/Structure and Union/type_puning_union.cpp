#include <bits/stdc++.h>
using namespace std;

union U{
    int x;
    double y;
};

union UU{
    int x; 
    char ch[4];
};

int main()
{
    U u;

    u.y = 1.1;
    cout << u.x << endl;
    UU uu;
    uu.x = 512;
    cout << (int)uu.ch[0] << ' ' << (int)uu.ch[1] << ' ' << (int)uu.ch[2] << ' ' << (int)uu.ch[3] <<endl;
}