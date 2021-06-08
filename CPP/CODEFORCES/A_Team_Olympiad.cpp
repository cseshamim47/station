#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n], tmp[n];
    for (int i = 0; i < n; i++)
    {
        cin >> arr[i];
        tmp[i] = arr[i];
    }
    sort(tmp, tmp + n);
    queue<int> p, m, ph;
    int a = 0, b = 0, c = 0;
    for (int i = 0; i < n; i++)
    {
        if (arr[i] == 1)
        {
            a++;
            p.push(i+1);
        }
        if (arr[i] == 2)
        {
            b++;
            m.push(i+1);
        }
        if (arr[i] == 3)
        {
            c++;
            ph.push(i+1);
        }
    }
    int str = 0;
    if (a <= b && a <= c)
        str = a;
    if (b <= a && b <= c)
        str = b;
    if (c <= b && c <= a)
        str = c;
    cout << str << endl;

    if(str > 0){
        for(int i = 0; i < str; i++){
            cout << p.front() << " " << m.front() << " " << ph.front() << "\n";
            p.pop(); m.pop(); ph.pop();
        }
    }
}
///////////////////////////////////////////////////////////////////////////////