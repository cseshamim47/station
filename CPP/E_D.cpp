//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

int main()
{
      //        Bismillah
    int cabbage,head,x,y,ans = 0;
    cin >> cabbage >> head >> x >> y;

    if(head <= cabbage)
    {
        ans = head*x;
        cabbage -= head;
        ans += cabbage*y;
        cout << ans << "\n";
    }
    else 
    {
        cout << cabbage*x << "\n";
    }
}