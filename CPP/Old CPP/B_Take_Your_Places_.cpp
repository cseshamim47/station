#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int even = 0, odd = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        if(arr[i] & 1) odd++;
        else even++;
    }
    int cnt = 0;
    for(int i = 1; i < n; i++)
    {
        if(arr[i] & 1 && arr[i-1] & 1) 
        {
            cnt++;
            if(i+2 != n) i++;
        }
        else if(arr[i] % 2 == 0 && arr[i-1] % 2 == 0) 
        {
            cnt++;
            if(i+2 != n) i++;
        }      
    }

    if(n == 1) cout << 0 << endl;
    else if(even != odd && n % 2 == 0) cout << -1 << endl;
    else if(abs(even-odd) > 1 && n & 1) cout << -1 << endl;
    else cout << cnt << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}