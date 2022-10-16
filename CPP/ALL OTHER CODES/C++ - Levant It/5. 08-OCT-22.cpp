#include <bits/stdc++.h>
using namespace std;


int main()
{
    /// while
    ///initializtion

//    int i = 0;
//
//    cout << "original value of i : " << i << endl;
//    cout << "post-increment(i++) : " << i++ << endl;
//    cout << "current value of i : " << i << endl;
//    cout << "pre-increment(++i) : " << ++i << endl;
//    i = 0;
//    while(i<5)
//    {
//        cout << i << " " << ++i << endl;
//        ///operation
//        ///modification
//    }
//
//    ///initialization
//    int m = 1;
//    do
//    {
//       ///operation
//       ///modification
//       cout << m << " ";
//       /// m = 1,2,3,4
//
//       m++;
//
//    }while(m <= 5);
//    cout << endl;
//    cout << m << endl;
//    /// n + 1 -> 1,2,3,4,5
//
//
//    /// infinite loop
//
//
//    int a, b;

//    while(cin >> a >> b)
//    {
//        int sum = a + b;
//        cout << sum << endl;
//    }

//    for(;;)
//    {
//        cin >> a >> b;
//        cout << (a+b) << endl;
//    }
    int var = 0;
//    comehere:
//
//        cout << var++ << endl;
//    if(var < 5) goto comehere;
//
//    cout << "break" << endl;

//    for(;;)
//    {
//        cin >> var;
//        switch(var)
//        {
//            case 1:
//                cout << "Case 1" << endl;
//                break;
//            case 2:
//                cout << "Case 2" << endl;
//                break;
//            case 3:
//                cout << "Case 3" << endl;
//                break;
//            default:
//                cout << "No match" << endl;
//        }
//    }


    /// asdfasd234asdfa132123s&$%dvzxvcklj5\87\12324

    /// dynamically resizable



//    string str = "asdf0asd234asdf2a132123s&$%dvzx1vcklj58712324";
//
//    for(int i = 0; i < str.size(); i++)
//    {
//        if((str[i] >= 'a' && str[i] <= 'z') or (str[i] >= 'A' && str[i] <= 'Z'))
//        {
//            if(str[i] == 'Z' || str[i] == 'z') break;
//            cout << str[i];
//        }else continue;
//    }

//    int n = 3;
//    auto m = 4;
//    int arr1[n]{1,2,3};
//    int arr2[m]{4,5,6,7};
//    int ans[n+m]; /// 1,2,3,4,5
//    int k = 0;
//    for(int i = 0; i < n; i++)
//    {
//        ans[k++] = arr1[i];
//    }
//
//    for(int i = 0; i < m; i++)
//    {
//        ans[k++] = arr2[i];
//    }
//
//    for(int i = 0; i < k; i++)
//    {
//        cout << ans[i] << " ";
//    }

//    for(int i = 0; i < 3; i++)
//    {
//        cout << arr[i] << " ";
//    }

    /// STL -> standard template library

    vector<int> vec(3);

    vec[0] = 1;
    vec[1] = 2;
    vec[2] = 3;
//    vec.push_back(1);
//    vec.push_back(2);
//    vec.push_back(3);

    for(auto x : vec) cout << x << " "; /// ranged based for loop
//    cout << vec.size() << endl;
//    vec.clear();
//    cout << vec.size() << endl;

//    for(int i = 0; i < vec.size(); i++) cout << vec[i] << " ";
//    int kk = 10;
//    while(true)
//    {
//        for(int i = 0; i < vec.size(); i++)
//        {
//            cout << vec[i] << " ";
//        }
//        cout << endl;
//        vec.push_back(++kk);
//        vec.pop_back();
//        vec.
//        getchar();
//    }

    return 0;
}
