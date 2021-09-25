#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n,k;
    cin >> n >> k;
    int a[n],b[n];
    for(int i = 0; i < n; i++) cin >> a[i];
    for(int i = 0; i < n; i++) cin >> b[i];
    sort(a,a+n);
    sort(b,b+n);
    int j = n-1;
    int sum = 0;
    for(int i = 0; i < n; i++)
    {
        if(k != 0)
        {
            sum += max(b[j],a[i]);
            k--;
            j--;
        }
        else sum += a[i];
    }
    cout << sum << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}