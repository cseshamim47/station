#include <bits/stdc++.h>
using namespace std;

union U{
    int x;
    int y;
    double n;
};

int main()
{
    U u;
    u.x = 10;
    cout << u.x << ' ' << u.y << endl;
    u.n = 20.5;
    cout << u.x << ' ' << u.y << endl;
    cout << sizeof(u) << endl;
}