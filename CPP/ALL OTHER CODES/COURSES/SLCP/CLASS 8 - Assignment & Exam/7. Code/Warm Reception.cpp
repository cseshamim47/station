#include <bits/stdc++.h>
using namespace std;

void solve()
{
    int n;
    cin >> n;
    int came[n];
    int leave[n];

    for(int i = 0; i < n; i++)
    {
        cin >> came[i];
    }
    for(int i = 0; i < n; i++)
    {
        cin >> leave[i];
    }
    int cnt = 1;
    int last = leave[0];
    for(int i = 1; i < n; i++)
    {
        if(last > came[i]) cnt++;
        last = min(last,leave[i]);
    }

    cout << cnt << endl;

}

int main()
{
    solve();
}