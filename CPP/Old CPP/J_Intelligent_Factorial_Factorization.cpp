#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

vector<int> p;
void isPrime(int n)
{
    if(n < 2) return;
    for(int i = 2; i*i <= n; i++)
    {
        if(n % i == 0) return;
    }
    p.push_back(n);
}

int Case;
void legendre(int n)
{
    cout << "Case " << ++Case <<  ": " << n << " = "; 
    for(int i = 0; i < p.size() && i <= n; i++)
    {
        int po = p[i];
        int cnt = 0;
        while(n>=po)
        {
            cnt += n/po;
            po *= p[i];
        }
        cout << p[i] << " (" << cnt << ")";
        if(i+1 < p.size() && n/p[i+1] != 0) cout << " * ";
        else break; 
    }
    cout << "\n";
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
    for(int i = 2; i <= 100; i++) isPrime(i);
    // for(int i = 0; i < 10; i++) cout << p[i] << " ";
    w(t)
     
}