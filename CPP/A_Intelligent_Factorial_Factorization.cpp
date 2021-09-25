#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

vector<int> v;
void primegen(int n)
{
    if(n >= 100) return;
    for(int i = 2; i*i <= n; i++)
    {
        if(n % i == 0) return primegen(n+1);
    }
    v.push_back(n);
    primegen(n+1);
}

int Case;
void legendre(int n)
{
    int cnt = 0;
    cout << "Case " << ++Case << ": " << n << " = ";
    for(int i = 0; i < v.size() && i <= n; i++)
    {
        if(i != 0) cout << " * ";
        int p = v[i];
        while(n/p != 0)
        {
            cnt += n/p;
            p *= v[i];
        }
        cout << v[i] << " (" << cnt << ")";
        cnt = 0;
        if(i+1 != v.size() && n/v[i+1] == 0) break;
    }
    cout << endl;
}

void solve()
{
    int n;
    cin >> n;
    legendre(n);
}

int main()
{
      //        Bismillah
    primegen(2);
    w(t)
    
}

