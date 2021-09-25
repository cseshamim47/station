#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int Case;
void solve()
{
    string a,b;
    ll d;
    cin >> a >> b;
    int len = b.length();
    d = (ll)stoi(b);
    d = abs(d);
    ll convrt = 0, k = 1, cnt = 0;
    for(int i = 0; i < a.size(); i++)
    {
        if(a[i] == '-') continue;
        convrt *= 10;
        convrt += (a[i]-'0');
        convrt %= d;
    }
    cout << "Case " << ++Case << ": ";
    if(convrt%d) cout << "not divisible" << endl;
    else cout << "divisible" << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}

// 1*1 + 2*10 + 1*100

// 1+20+100 = 121