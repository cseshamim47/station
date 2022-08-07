#include <bits/stdc++.h>
using namespace std;

int main()
{
    int a , b, c;
    cin >> a >> b >> c;

    int ans1 = b-a-1;
    int ans2 = c-b-1;

    if(ans1>ans2) cout << ans1 << endl;
    else cout << ans2 << endl;
    
}