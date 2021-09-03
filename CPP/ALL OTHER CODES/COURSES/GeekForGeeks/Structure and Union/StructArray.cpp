#include <bits/stdc++.h>
using namespace std;
typedef struct Point{
    int x; 
    int y;
}P;

int main()
{
    P p[3];

    for(int i = 0; i < 3; i++){
        p[i].x = i;
        p[i].y = i*10;
    }
    
    for(auto x : p){
        cout << x.x << ' ' << x.y << endl;
    }
    
}