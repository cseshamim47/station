#include <bits/stdc++.h>
using namespace std;

#define endl "\n"

void solve()
{
    int n,k;
    cin >> n >> k;

    vector<int> v(n);

    for(int i = 0; i < n; i++) cin >> v[i];

    int odd = 0;

    for(int i = 0; i < n; i++) if(v[i]%2 != 0) odd++;

    int even = n-odd;

    if(odd%2 == 0 && odd != 0) odd--;


    if(k%2 == 0 && even != 0 && odd != 0 && (odd + even) >= k) cout << "Yes" << endl;
    else if(k&1 && odd != 0 && (odd + even) >= k) cout << "Yes" << endl;
    else cout << "No" << endl;
}

int main()
{
    ios_base::sync_with_stdio();
    cin.tie(NULL);
    int q;
    cin >> q;
    while(q--)
    {
        solve();
    }
}
