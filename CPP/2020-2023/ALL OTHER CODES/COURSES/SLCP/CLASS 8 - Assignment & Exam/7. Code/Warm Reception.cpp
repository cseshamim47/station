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

    sort(came,came+n);
    sort(leave,leave+n);

    int cnt = 0;
    int j = 0;

    for(int i = 0; i < n; i++)
    {
        cout << came[i] << " " << leave[i] << endl;
    }

    for(int i = 0; i < n; i++)
    {
        if(came[i] < leave[j]) cnt++;
        else j++;

        cout << j << endl;
    }


    cout << cnt << endl;

}

int main()
{
    solve();
}

